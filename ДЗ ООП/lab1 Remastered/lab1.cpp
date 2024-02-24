#include <iostream>
#include <cstring> 
#include <fstream>
#include "Structs.h"
using namespace std;
int main()
{

    int choice;
    while (1) {
        cout << "User Interface:" << endl;
        cout << "1.Show full information:" << endl;
        cout << "2.Show employee by ID:" << endl;
        cout << "3.Show position by ID:" << endl;
        cout << "4.Add new employee:" << endl;
        cout << "5.Add new position:" << endl;
        cout << "6.Delete eployee:" << endl;
        cout << "7.Delete position:" << endl;
        cout << "8.Clear all files:" << endl;
        cout << "9.Close DataBase:" << endl;
        cout << "10.Update data employee:" << endl;
        cout << "11. Show Positions:" << endl;
        cin >> choice;
        switch (choice) {
        case 1:
            Show_full_information();
            break;
        case 2:
            int indexemp;
            cout << "Input index:" << endl;
            cin >> indexemp;
            Read_Employeefl(indexemp);
            break;
        case 3:
            int indexp;
            cout << "Input index:" << endl;
            cin >> indexp;
            Read_Positionfl(indexp);
            
            break;
        case 4:
            cout << "1.Continue:" << endl;
            cout << "2.Cansel:" << endl;
            cin >> choice;
            switch (choice) {
            case 1:
                Employee emp;

                cout << "Input passport:" << endl;
                cin >> emp.passport;
                cout << "Input Full Name:" << endl;
                cin.ignore();
                cin.getline(emp.full_name, sizeof(emp.full_name));
                cout << "Input position:" << endl;
                cin >> emp.p_id;
                emp.is_deleted = false;
                emp.emp_id = 1;
                Add_Employee(emp);
                break;
            case 2:
                break;
            }
            break;
        case 5:
            cout << "1.Continue:" << endl;
            cout << "2.Cansel:" << endl;
            cin >> choice;
            switch (choice) {
            case 1:
                Position pos;
                cout << "Input Name:" << endl;
                cin >> pos.name;
                cout << "Input Description:" << endl;
                cin.ignore();
                cin.getline(pos.description, sizeof(pos.description));
                pos.p_id = 1;
                pos.is_deleted = false;
                Add_Position(pos);
                break;
            case 2:
                break;
            }
            break;
        case 6:
            cout << "1.Continue:" << endl;
            cout << "2.Cansel:" << endl;
            cin >> choice;
            switch (choice) {
            case 1:
                cout << "Input index" << endl;
                int indexdel;
                cin >> indexdel;
                Delete_Employee(indexdel);
            }
           
            break;
        case 7:
            cout << "1.Continue:" << endl;
            cout << "2.Cansel:" << endl;
            cin >> choice;
            switch (choice) {
            case 1:
                cout << "Input index" << endl;
                int indexdel;
                cin >> indexdel;
                Delete_Position(indexdel);
            }

            break;
        case 8:
            cout << "1.Continue:" << endl;
            cout << "2.Cansel:" << endl;
            cin >> choice;
            switch (choice) {
            case 1:
                Clear_all_files("Employee.bin");
                Clear_all_files("Employeeind.bin");
                Clear_all_files("Position.bin");
                Clear_all_files("Positionind.bin");
                break;
            case 2:
                break;
            }
            break;
        case 9:
            return 0;
        case 10:

            cout << "Input emp_id:" << endl;
            int emp_index;
            cin >> emp_index;
            cout << "Input new p_id:" << endl;
            int p_index;
            cin >> p_index;
            update_employee(emp_index, p_index);
            break;
        case 11:
            Show_position();
            break;
        }

    }
}
