# Get puzzle input
digits = str(input("What's the puzzle input? \n"))
jump = int(input("How big should the jump be? Write '0' to divide the number of digits by 2. \n"))

solution = 0
numberofdigits = len(digits)

if jump == 0:
    jump = numberofdigits / 2

for index, digit in enumerate(digits):

    # Get the index after jump.
    # When out of array bounds, set the index to the 'overhead'.
    if index + jump < numberofdigits:
        nextindex = index + jump
    else:
        nextindex = (index + jump) - numberofdigits

    # Convert digit from string to int
    digit = int(digit)

    # Check if the current digit is the same as the next.
    # If it is, add it to the solution.
    if digit == int(digits[nextindex]):
        solution += digit

# Print the solution
print "Your captcha is " + str(solution) + "."
