const task = new Object();
task.id = 1;
task.name = "Debug";
task.owner = "Xavi";

const task1 = {
    id: 1,
    name: "Debug",
    owner: "Xavi"
};


function Task(id, name, owner) {
    this.id = id;
    this.name = name;
    this.owner = owner;
}

const task = new Task(1,"Debug","Xavi");