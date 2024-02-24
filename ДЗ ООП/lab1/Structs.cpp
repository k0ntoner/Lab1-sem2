#include "Structs.h"
using namespace std;

Employee Read_Employeefl(int index)
{
    cout << endl << "------------------------------------------" << endl << endl;
    Employeeind check = Read_Employeeind(index);
    if (check.emp_id == 0) {
        cout << "We dont have such position";
        return Employee();
    }
    ifstream file("Employee.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Cant open file" << endl;
        return Employee();
    }
    Employeeind empInd = Read_Employeeind(index);

    int byte_position = empInd.bytes;
    file.seekg(byte_position, ios::beg);
    Employee emp;
    file.read(reinterpret_cast<char*>(&emp), sizeof(Employee));
    
    cout << "Employee ID: " << emp.emp_id << endl;
    cout << "Detail ID: " << emp.passport << endl;
    cout << "Name: " << emp.full_name << endl;
    Read_Positionfl(emp.p_id);
    cout << endl << "------------------------------------------" << endl << endl;
    file.close();

    return emp;
}

Employeeind Read_Employeeind(int index)
{
    ifstream file("Employeeind.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Cant open file" << endl;
        return Employeeind(); 
    }

    Employeeind empInd;

    while (file.read(reinterpret_cast<char*>(&empInd), sizeof(Employeeind))) {

        if (empInd.emp_id == index) {

            
            file.close();
            return empInd;

        }
    }

    cout << "Record with index " << index << " not found." << endl;

    file.close();

    return Employeeind();
}

Position Read_Positionfl(int index)
{

    ifstream file("Position.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Cant open file" << endl;
        return Position();
    }
    Positionind posInd = Read_Positionind(index);
    int byte_position = posInd.bytes;
    file.seekg(byte_position, ios::beg);
    Position pos;
    file.read(reinterpret_cast<char*>(&pos), sizeof(Position));

    cout << "Position ID: " << pos.p_id << endl;
    cout << "Name: " << pos.name << endl;
    cout << "Description: " << pos.description << endl;
    
    file.close();

    return pos;
}

Positionind Read_Positionind(int index)
{
    ifstream file("Positionind.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Cant open file" << endl;
        return Positionind();
    }

    Positionind posInd;

    while (file.read(reinterpret_cast<char*>(&posInd), sizeof(Positionind))) {

        if (posInd.p_id == index) {

       
            file.close();
            return posInd;

        }
    }

    cout << "Record with index " << index << " not found." << endl;

    file.close();

    return Positionind();
}

void Add_Employee(Employee emp)
{
    Positionind position = Read_Positionind(emp.p_id);
    if (position.p_id== 0) {
        cout << "We dont have such position";
        return;
    }
    ofstream file("Employee.bin", ios::binary | ios::app);

    if (!file.is_open()) {
        cout << "File didnt open" << endl;
        return;
    }
    emp.emp_id = get_empInd()+1;
    int byte_position = (emp.emp_id-1) * emp.get_bytes();

    file.write(reinterpret_cast<char*>(&emp), sizeof(Employee));

    file.close();

    Employeeind empInd;
    empInd.emp_id = emp.emp_id;
    empInd.bytes = byte_position;

    ofstream fileind("Employeeind.bin", ios::binary | ios::app);

    if (!fileind.is_open()) {
        cout << "File didnt open" << endl;
        return;
    }
    
    fileind.write(reinterpret_cast<char*>(&empInd), sizeof(Employeeind));

    fileind.close();


}

void Add_Position(Position pos)
{
    ofstream file("Position.bin", ios::binary | ios::app);
    
    if (!file.is_open()) {
        cout << "File didnt open" << endl;
        return;
    }
    pos.p_id = get_posInd() + 1;
    int byte_position = (pos.p_id - 1) * pos.get_bytes();

    file.write(reinterpret_cast<char*>(&pos), sizeof(Position));

    file.close();

    Positionind posInd;
    posInd.p_id = pos.p_id;
    posInd.bytes = byte_position;

    ofstream fileind("Positionind.bin", ios::binary | ios::app);

    if (!fileind.is_open()) {
        cout << "File didnt open" << endl;
        return;
    }

    fileind.write(reinterpret_cast<char*>(&posInd), sizeof(Positionind));

    fileind.close();

}

void Delete_Employee(int index_to_delete)
{
    ifstream infile("Employee.bin", ios::binary);
    ofstream outfile("temp.bin", ios::binary | ios::trunc); 

    if (!infile || !outfile) {
        cout << "Failed to open files!" << endl;
        return;
    }

    Employee emp;

    while (infile.read(reinterpret_cast<char*>(&emp), sizeof(Employee))) {
        if (emp.emp_id != index_to_delete) {
            outfile.write(reinterpret_cast<char*>(&emp), sizeof(Employee));
        }
        else {
            emp.is_deleted = true;
            outfile.write(reinterpret_cast<char*>(&emp), sizeof(Employee));
        }
    }

    infile.close();
    outfile.close();

    
    if (remove("Employee.bin") != 0) {
        cout << "Error deleting file!" << endl;
        return ;
    }
    if (rename("temp.bin", "Employee.bin") != 0) {
        cout << "Error renaming file!" << endl;
        return;
    }

    cout << "Record with index " << index_to_delete << " has been deleted!" << endl;
    ifstream infileInd("Employeeind.bin", ios::binary);
    ofstream outfileInd("tempind.bin", ios::binary | ios::trunc);

    if (!infileInd || !outfileInd) {
        cout << "Failed to open files!" << endl;
        return;
    }

    Employeeind empInd;

    while (infileInd.read(reinterpret_cast<char*>(&empInd), sizeof(Employeeind))) {
        if (empInd.emp_id != index_to_delete) {
            outfileInd.write(reinterpret_cast<char*>(&empInd), sizeof(Employeeind));
        }
    }

    infileInd.close();
    outfileInd.close();

    if (remove("Employeeind.bin") != 0) {
        cout << "Error deleting file!" << endl;
        return;
    }
    if (rename("tempind.bin", "Employeeind.bin") != 0) {
        cout << "Error renaming file!" << endl;
        return;
    }

    cout << "Record with index " << index_to_delete << " has been deleted!" << endl;
}

void Delete_Position()
{
}

void Show_full_information()
{
    cout << endl << "------------------------------------------" << endl << endl;
    ifstream file("Employee.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Unable to open file!" << endl;
        return;
    }

    Employee emp;

    while (file.read(reinterpret_cast<char*>(&emp), sizeof(Employee))) {
        if (emp.is_deleted != true) {
            cout << "Employee ID: " << emp.emp_id << endl;
            cout << "Passport: " << emp.passport << endl;
            cout << "Full Name: " << emp.full_name << endl;

            Read_Positionfl(emp.p_id);
            cout << endl << "------------------------------------------" << endl << endl;
        }
    }

    file.close();
}
void Clear_all_files(const string& filename)
{
    ofstream file(filename, ofstream::out | ofstream::trunc);
    if (file.is_open()) {
        cout << "File " << filename << " cleared successfully." << endl;
        file.close();
    }
    else {
        cerr << "Unable to clear file " << filename << endl;
    }
}

int get_empInd() {
    ifstream file("Employeeind.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Can't open file" << endl;
        return -1; 
    }

    int maxIndex = 0;
    Employeeind empInd;

    while (file.read(reinterpret_cast<char*>(&empInd), sizeof(Employeeind))) {
        if (empInd.emp_id > maxIndex) {
            maxIndex = empInd.emp_id;
        }
    }

    file.close();

    return maxIndex;
}
int get_posInd()
{
    ifstream file("Positionind.bin", ios::binary);

    if (!file.is_open()) {
        cout << "Can't open file" << endl;
        return -1;
    }

    int maxIndex = 0;
    Positionind posInd;

    while (file.read(reinterpret_cast<char*>(&posInd), sizeof(Positionind))) {
        if (posInd.p_id > maxIndex) {
            maxIndex = posInd.p_id;
        }
    }

    file.close();

    return maxIndex;
}
int Employee::get_bytes()
{
    return sizeof(Employee);
}

int Position::get_bytes()
{
    return sizeof(Position);
}
