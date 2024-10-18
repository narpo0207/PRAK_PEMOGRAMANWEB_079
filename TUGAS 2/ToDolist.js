document.getElementById("add-btn").addEventListener("click", addTask);

function addTask() {
    const taskInput = document.getElementById("todo-input");
    const taskValue = taskInput.value.trim();

    if (taskValue === "") return;

    const li = document.createElement("li");
    const span = document.createElement("span");
    span.textContent = taskValue;

    const editBtn = document.createElement("button");
    editBtn.innerHTML = "Edit";
    editBtn.classList.add("edit-btn");
    editBtn.addEventListener("click", () => editTask(span));
    editBtn.onclick = function () {
        editTask(index)
    };

    const deleteBtn = document.createElement("button");
    deleteBtn.innerHTML = "Delete";
    deleteBtn.classList.add("delete-btn");
    deleteBtn.addEventListener("click", () => deleteTask(li));

    li.appendChild(span);
    li.appendChild(editBtn);
    li.appendChild(deleteBtn);

    document.getElementById("todo-list").appendChild(li);
    taskInput.value = "";
}

function editTask(taskSpan) {
    const newTask = prompt("Edit task:", taskSpan.textContent);
    if (newTask !== null && newTask.trim() !== "") {
        taskSpan.textContent = newTask;
    }
}

function deleteTask(taskLi) {
    taskLi.remove();
}
