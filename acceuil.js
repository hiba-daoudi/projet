
  function upload1() {
    var input = document.querySelector('input[type=file]');
    var file = input.files[0];
    console.log(file);
    window.location.href="tkherbika.php?var1=" + file;
    };
    
  
 async function upload2() {
    var input = document.querySelector('input[type=file]');
    var file = input.files[0];
    var form = new FormData();
    form.append('image', file);

    window.location.href="..\test\index.php";
  }