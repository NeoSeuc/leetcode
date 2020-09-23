/**1476. Subrectangle Queries*/

/** 
Implement the class SubrectangleQueries which receives a rows x cols rectangle as a matrix of integers in the constructor and supports two methods:

1. updateSubrectangle(int row1, int col1, int row2, int col2, int newValue)

Updates all values with newValue in the subrectangle whose upper left coordinate is (row1,col1) and bottom right coordinate is (row2,col2).
2. getValue(int row, int col)

Returns the current value of the coordinate (row,col) from the rectangle.
*/

/**
 * @param {number[][]} rectangle
 */
var SubrectangleQueries = function(rectangle) {
    this.rectangle = rectangle;
};

/** 
 * @param {number} row1 
 * @param {number} col1 
 * @param {number} row2 
 * @param {number} col2 
 * @param {number} newValue
 * @return {void}
 */
SubrectangleQueries.prototype.updateSubrectangle = function(row1, col1, row2, col2, newValue) {
    for (let i = row1; i <= row2; i++) {
        for (let j = col1; j <= col2; j++) {
            this.rectangle[i][j] = newValue;
        }
    }
};

/** 
 * @param {number} row 
 * @param {number} col
 * @return {number}
 */
SubrectangleQueries.prototype.getValue = function(row, col) {
    return this.rectangle[row][col];
};


let subrectangleQueries = new SubrectangleQueries([[1,2,1],[4,3,4],[3,2,1],[1,1,1]]);
subrectangleQueries.updateSubrectangle(0, 0, 3, 2, 5);
