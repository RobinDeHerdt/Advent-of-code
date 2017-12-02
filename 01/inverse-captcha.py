# Input digits
digits = str(input("What's the puzzle input? \n"))

digitsum = 0
digitcount = len(digits)

for index, digit in enumerate(digits):
    # Check if the next digit is the same as the current.
    if index + 1 < digitcount:
        nextindex = index + 1
    else:
        nextindex = 0

    if int(digit) == int(digits[nextindex]):
        digitsum += int(digit)

print digitsum
