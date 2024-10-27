
// let myModal = new bootstrap.modal(document.getElementById('task_content'));

//     async function fetchTasks() {
//         try {
//             let response = await fetch('fetch_data.php'); // Exemplo: '/api/get_tasks.php'
//             if (!response.ok) {
//                 throw new Error('Erro na requisição: ' + response.statusText);
//             }
//             let data = await response.json();
//             console.log(data); // Exibe ou manipula os dados

//             let container =document.querySelector('#task-container');

//             data.forEach((item,index)=>{

//              let taskElement = document.createElement('div');
             
//              taskElement.textContent = `${item.id} - Task: ${item.task_title} - Status: ${item.task_statu})`;

//              taskElement.addEventListener('click',()=>{
//                 // alert(`descrição da tarefa: ${item.task_description}`)
//                 document.getElementById('text-title').value = item.task_title;
//                 document.getElementById('full-text-description').value = item.task_description;
                
//                 // Exibir o modal
//                 myModal.show();

//              })

//              container.appendChild(taskElement)
//             });




//         } catch (error) {
//             console.error('Erro ao buscar dados:', error);
//         }
//     }
    

//     fetchTasks(); // Chama a função ao carregar a página ou conforme necessário
//     localtion.reload()