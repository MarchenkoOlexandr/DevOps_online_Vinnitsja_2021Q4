# Module Python Essentials 

## TASK - 01. 

1. Реализовать скрипт, который решает квадратное уравнение вида 𝑎𝑥ଶ + 𝑏𝑥 + 𝑐 = 0.
Параметры квадратного уравнения 𝑎, 𝑏, 𝑐 задаются вводом или через аргументы командной строки.
В скрипте реализовать несколько функций, которые декомпозируют задачу решения квадратного
уравнения. В эти функции должны передаваться параметры. Также на эти функций написать UnitTests.
Основной скрипт solv_square_equation.py должен иметь следующие функции:
- main()
- validate_param(int) - проверяет, что введено число, повторяет ввод 3 раза если не число
(использовать exception)
- discriminant(a, b, c)
- roots(d, a, b, c)
- solv_square(a, b, c) -> roots
- square_print(a, b, c, roots) – выводит на экран результат
на 
- discriminant(a, b, c)
- roots(d, a, b, c)
- solv_square(a, b, c) -> roots
написать UnitTest.
Не использовать глобальные переменные.
* Реализовать возврат exit_code из скрипта, в котором должна кодироваться ошибка. Количество
возможных ошибок определить самостоятельно. Разрешено использовать глобальные переменны
(константы), которые записываются большими буквами и слова разделены “_” (Пример:
SUCCESS_EXIT=0). Эти переменные можно использовать только в методе main(). 

****

```
#!/usr/bin/env python3

def main():  
    a = float(validate_param("a"))
    b = float(validate_param("b"))
    c = float(validate_param("c"))
    square_print(a, b, c, roots(discriminant(a, b, c), a, b, c))

def validate_param(msg):
    count = 1
    while count <= 3:
        print(f"Please enter parametr {msg}")
        num = input('you have 3 attepmts try {} '.format(count))
        try: 
            float(num)
            print(f'Parametr {msg} is ok =', num)
            break
        except ValueError:
            print(f"Parametr {msg} is incorrect, please try again")
            count+=1
        if count == 4:
            print(f"{msg} is incorrect, exit")
            quit()
    return num


def discriminant(a, b, c):
    return  b * b - 4 * a * c

def roots(d, a, b, c):  
    if d < 0:
        return (None, None)
    elif d == 0:
        x1 = -b / (2 * a)
        return (round(x1, 3), None)
    else:
        x1 = (-b + d ** 0.5) / (2 * a)
        x2 = (-b - d ** 0.5) / (2 * a)
        return (round(x1, 3), round(x2, 3))

def solv_square(a, b, c) -> roots:
    d = discriminant(a, b, c)
    return roots(d, a, b, c)

def square_print(a, b, c, roots):
    x1, x2 = roots
    print(f"Equation: {a}x^2 + {b}x + {c} = 0")
    print(f"Square equation roots: {x1} and {x2}")
if __name__ == "__main__":
	main()

```
***python3 solv_square_equation.py***

![result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_0.png "result")


***

```
#!/usr/bin/env python3

import unittest
import solv_square_equation

class Solv_square_equation(unittest.TestCase):

    def test_discriminant(self):
        self.assertEqual(solv_square_equation.discriminant(4, 6, 2), 4)
        self.assertEqual(solv_square_equation.discriminant(-5, 6, 8), 196)
        self.assertEqual(solv_square_equation.discriminant(-12.5, 0, -4.5), -225.0)
        self.assertEqual(solv_square_equation.discriminant(-9, 0, 0), 0)
 
    def test_roots(self):
        self.assertEqual(solv_square_equation.roots(4, 4, 6, 2), (-0.5, -1.0))
        self.assertEqual(solv_square_equation.roots(196, -5, 6, 8), (-0.8, 2.0))
        self.assertEqual(solv_square_equation.roots(-225, -12.5, 0, -4.5), (None, None))
        self.assertEqual(solv_square_equation.roots(-3, 1, 1, 1), (None, None))
        self.assertEqual(solv_square_equation.roots(0, -9, 0, 0), (0.00, None))
 
    def test_solv_square(self):
        self.assertEqual(solv_square_equation.solv_square(1, 2, 3), (None, None))
        self.assertEqual(solv_square_equation.solv_square(4, 6, 2), (-0.5, -1.0))
        self.assertEqual(solv_square_equation.solv_square(-12.5, 0, -4.5), (None, None))
        self.assertEqual(solv_square_equation.solv_square(1, 1, 1), (None, None))
        self.assertEqual(solv_square_equation.solv_square(-9, 0, 0), (0.00, None))
if __name__ == "__main__":
	unittest.main()
 
```

***python3 -m unittest -v UnitTest_solv_square_equation.py***

![result](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_01.png "result")

**For this task I installed Jupyter Notebook and made examples from the lecture**

```
sudo apt update

sudo apt install python3-pip python3-dev

Install virtualenv.

sudo -H pip3 install --upgrade pip

sudo -H pip3 install virtualenv

mkdir ~/devops8

cd ~/devops8

mkdir my_project_dir

virtualenv my_project_env

source devops8/my_project_env/bin/activate

pip install jupyter

source devops8/my_project_env/bin/activate

cd ~/devops8

jupyter notebook

```


![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_1.png "examples from the lecture")

![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_2.png "examples from the lecture")
	
![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_3.png "examples from the lecture")

![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_4.png "examples from the lecture")

![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_5.png "examples from the lecture")

![examples from the lecture](https://github.com/MarchenkoOlexandr/DevOps_online_Vinnitsja_2021Q4/blob/db36dd3662a2e90216bbaefd8415b42cd90bae5f/m1/task8.1/Screenshot_6.png "examples from the lecture")