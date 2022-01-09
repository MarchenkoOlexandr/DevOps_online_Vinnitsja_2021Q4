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