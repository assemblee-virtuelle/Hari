document.addEventListener('DOMContentLoaded', function() {

  // let button = document.querySelector('button');
  // let content = document.querySelector('input[name="content"]');
  // let to = document.querySelector('input[name="to"]');

  let data =
  {
    content: 'test',
    to: 'value'
  };

  // console.log(data);
  // console.log(JSON.stringify(data));

  button.addEventListener('click', function() {
    fetch("index.php", {
      method: "POST",
      mode: "same-origin",
      credentials: "same-origin",
      headers: {
        "Content-type": "application/json",
        "Accept": "application/json"
      },
      body: JSON.stringify(data)
    }).then(res => res.json())
    .then(response => console.log('Success:', JSON.stringify(response)))
    .catch(error => console.error('Error:', error));
    //window.location.reload();
  });

})
