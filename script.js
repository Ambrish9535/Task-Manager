document.addEventListener('DOMContentLoaded', function() {
  const taskForm = document.getElementById('task-form');
  const taskList = document.getElementById('task-list');

  taskForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const dueDate = document.getElementById('due-date').value;

    if (title.trim() === '' || dueDate.trim() === '') {
      alert('Please fill out all required fields.');
      return;
    }

    const taskItem = document.createElement('div');
    taskItem.classList.add('task-item');
    taskItem.innerHTML = `
      <h3>${title}</h3>
      <p>Description: ${description}</p>
      <p>Due Date: ${dueDate}</p>
      <button class="delete-btn">Delete</button>
      <button class="update-btn">Update</button>
    `;
    
    taskList.appendChild(taskItem);

    // Reset form fields
    taskForm.reset();
  });

  taskList.addEventListener('click', function(event) {
    if (event.target.classList.contains('delete-btn')) {
      event.target.parentElement.remove();
    } else if (event.target.classList.contains('update-btn')) {
      const taskItem = event.target.parentElement;
      const title = taskItem.querySelector('h3').textContent;
      const description = taskItem.querySelector('p:nth-of-type(1)').textContent.replace('Description: ', '');
      const dueDate = taskItem.querySelector('p:nth-of-type(2)').textContent.replace('Due Date: ', '');
      
      document.getElementById('title').value = title;
      document.getElementById('description').value = description;
      document.getElementById('due-date').value = dueDate;

      taskItem.remove();
    }
  });
});
