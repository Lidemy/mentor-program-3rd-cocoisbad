// Stack
function Stack() {
  const arr = [];
  return {
    push: (num) => {
      arr[arr.length] = num;
      return arr;
    },
    pop: () => {
      const result = arr[arr.length - 1];
      arr.splice(arr.length - 1, 1);
      return result;
    },
  };
}

// Queue
function Queue() {
  const arr = [];
  return {
    push: (num) => {
      arr[arr.length] = num;
      return arr;
    },
    pop: () => {
      const result = arr[0];
      arr.splice(0, 1);
      return result;
    },
  };
}


const stack = new Stack();
stack.push(10);
stack.push(5);
console.log(stack.pop()); // 5
console.log(stack.pop()); // 10

const queue = new Queue();
queue.push(1);
queue.push(2);
console.log(queue.pop()); // 1
console.log(queue.pop()); // 2
