<!DOCTYPE html>
<html>
  <head>
    <title>My Drag-and-Drop Example</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <style>
  .example-parent {
  border: 2px solid #DFA612;
  color: black;
  display: flex;
  font-family: sans-serif;
  font-weight: bold;
}

.example-origin {
  flex-basis: 100%;
  flex-grow: 1;
  padding: 10px;
}

.example-draggable {
  background-color: #4AAE9B;
  font-weight: normal;
  margin-bottom: 10px;
  margin-top: 10px;
  padding: 10px;
}

.example-dropzone {
  background-color: #6DB65B;
  flex-basis: 100%;
  flex-grow: 1;
  padding: 10px;
}
  
  </style>
  <body>
  <div class="example-parent">
  <div class="example-origin">
    <div
      id="draggable-1"
      class="example-draggable"
    >
      <div class="example-parent">
  <div class="example-origin">
    <div
      id="draggable-1"
      class="example-draggable"
      draggable="true"
	  ondragstart="onDragStart(event);"
    >
      thing 1
    </div>
	<div
      id="draggable-2"
      class="example-draggable"
      draggable="true"
      ondragstart="onDragStart(event);"
    >
      thing 2
    </div>
    <div
      id="draggable-3"
      class="example-draggable"
      draggable="true"
      ondragstart="onDragStart(event);"
    >
      thing 3
    </div>
    <div
      id="draggable-4"
      class="example-draggable"
      draggable="true"
      ondragstart="onDragStart(event);"
    >
      thing 4
    </div>
  </div>

  <div
    class="example-dropzone"
	ondragover="onDragOver(event);"
	ondrop="onDrop(event);"
  >
    done
  </div>
   <div
    class="example-dropzone"
	ondragover="onDragOver(event);"
	ondrop="onDrop(event);"
  >
    done
  </div>
</div>
    </div>
  </div>

 
</div>
  </body>
  <script>
  function onDragStart(event) {
  event
    .dataTransfer
    .setData('text/plain', event.target.id);

  event
    .currentTarget
    .style
    .backgroundColor = 'yellow';
}
function onDragOver(event) { 
  event.preventDefault();
}
function onDrop(event) {
  const id = event
    .dataTransfer
    .getData('text');
	const draggableElement = document.getElementById(id);
	const dropzone = event.target;
	dropzone.appendChild(draggableElement);
	 event
    .dataTransfer
    .clearData();
}
  </script>
</html>