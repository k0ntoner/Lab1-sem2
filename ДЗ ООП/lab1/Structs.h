#include <iostream>
#include <string>
#include <fstream>
using namespace std;

#pragma once
struct Employee {

    int emp_id;
    int passport;
    char full_name[45];
    int p_id;
    int get_bytes();
    bool is_deleted;
};
struct Employeeind {
    int emp_id;
    int bytes;
};
struct Position {
    int p_id;
    char name[45];
    char description[225];
    int get_bytes();
};
struct Positionind {
    int p_id;
    int bytes;
};
Employee Read_Employeefl(int index);
Employeeind Read_Employeeind(int index);
Position Read_Positionfl(int index);
Positionind Read_Positionind(int index);
void Add_Employee(Employee emp);
void Add_Position(Position pos);
void Delete_Employee(int index_to_delete);
void Delete_Position();
void Show_full_information();
void Clear_all_files(const string& filename);
int get_empInd();
int get_posInd();