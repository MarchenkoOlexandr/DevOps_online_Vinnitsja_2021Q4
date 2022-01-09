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