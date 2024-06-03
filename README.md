# Звіт

Лабораторна робота поділяється на 3 файли, перший **Diagrams**, в якій знаходяться всі діаграми. В другій папці **OOP Code** знаходиться код, по якій робились діаграми.

Діаграми розроблені на основі програми по керуванню біблотекаю, її персоналом, їхніми посадами та тд.

## Код

Сам код розроблений в двух варіаціях. Преша з використанням мови с++ та бінарних файлів, друга за допомогою Html, php та Mysql.

## Діаграми

Реалізовано такі діаграми:

+ Activity
+ Class
+ Component
+ Deployement
+ Interaction Overview
+ Object
+ Package
+ Sequence
+ State
+ Use Case
+ Communication
  
## Глосарій
Глосарій

### Файли та бібліотеки
+ #include <iostream>: Додає бібліотеку для введення/виведення даних.
+ #include <cstring>: Додає бібліотеку для роботи з рядками.
+ #include <fstream>: Додає бібліотеку для роботи з файлами.
+ #include "Structs.h": Включає користувацький заголовковий файл з визначеннями структур.
### Структури
struct Employee: Структура, що представляє працівника. Містить поля:

+ int emp_id: Ідентифікатор працівника.
+ int passport: Номер паспорта працівника.
+ char full_name[45]: Повне ім'я працівника.
+ int p_id: Ідентифікатор посади.
+ bool is_deleted: Флаг видалення працівника.
+ struct Employeeind: Структура індексу працівника. Містить поля:

+ int emp_id: Ідентифікатор працівника.
+ int bytes: Розмір даних працівника в байтах.
+ struct Position: Структура, що представляє посаду. Містить поля:

+ int p_id: Ідентифікатор посади.
+ char name[45]: Назва посади.
+ char description[225]: Опис посади.
+ bool is_deleted: Флаг видалення посади.
+ struct Positionind: Структура індексу посади. Містить поля:

+ int p_id: Ідентифікатор посади.
+ int bytes: Розмір даних посади в байтах.
### Функції
+ Employee Read_Employeefl(int index): Читає дані працівника за індексом.
+ Employeeind Read_Employeeind(int index): Читає індекс працівника за індексом.
+ Position Read_Positionfl(int index): Читає дані посади за індексом.
+ Positionind Read_Positionind(int index): Читає індекс посади за індексом.
+ void Add_Employee(Employee emp): Додає нового працівника.
+ void Add_Position(Position pos): Додає нову посаду.
+ void Delete_Employee(int index_to_delete): Видаляє працівника за індексом.
+ void Delete_Position(int index_to_delete): Видаляє посаду за індексом.
+ void Delete_emp_with_pos(int p_id): Видаляє працівника за ідентифікатором посади.
+ void Delete_Position_second_v(int index_to_delete): Друга версія функції видалення посади.
+ bool Check_is_emp_has_p(int p_id): Перевіряє, чи є у працівника певна посада.
+ void Show_position(): Показує всі посади.
+ void update_employee(int emp_index, int new_p_index): Оновлює дані працівника.
+ void Show_full_information(): Показує повну інформацію про всі дані.
+ void Clear_all_files(const string& filename): Очищає всі файли.
+ int get_empInd(): Повертає індекс працівника.
+ int get_posInd(): Повертає індекс посади.
### Основна функція
+ int main(): Головна функція, що запускає програму. Вона містить меню для користувача з різними опціями:
+ Показати повну інформацію.
+ Показати працівника за ID.
+ Показати посаду за ID.
+ Додати нового працівника.
+ Додати нову посаду.
+ Видалити працівника.
+ Видалити посаду.
+ Очистити всі файли.
+ Закрити базу даних.
+ Оновити дані працівника.
+ Показати всі посади.
