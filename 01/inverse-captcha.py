# Get puzzle digits
digits = str(input("What's the puzzle input? \n"))

solution = 0
numberofdigits = len(digits)

# Loop over each digit
for index, digit in enumerate(digits):

    # Get the next index in the array.
    # When the index is out of array bounds, set it to 0.
    if index + 1 < numberofdigits:
        nextindex = index + 1
    else:
        nextindex = 0

    # Convert digit from string to int
    digit = int(digit)

    # Check if the current digit is the same as the next.
    # If it is, add it to the solution.
    if digit == int(digits[nextindex]):
        solution += digit

# Print the solution
print solution
