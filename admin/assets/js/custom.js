// choose category image
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.innerHTML = '<img src="' + this.result + '" style="max-width:100%;" />';
    });    
  }
  
}



// choose multi image
const chooseMultiFile = document.getElementById("choose-multi-file");
const MultiImgPreview = document.getElementById("multi-img-preview");

chooseMultiFile.addEventListener("change", function () {
  getMultiImgData();
});

function getMultiImgData() {
  MultiImgPreview.innerHTML="";
  for(i=0;i<chooseMultiFile.files.length;i++){
    const files = chooseMultiFile.files[i];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      MultiImgPreview.style.display = "block";
      MultiImgPreview.innerHTML += '<img src="' + this.result + '" style="width:20%; display:inline;  " />';
    });    
  }
  }
  
}




//ajax

function fetch_sub_cat()
{
  var val = document.getElementById('p_catagory_ajax').value;
  if(document.getElementById('p_ajax_p_category') != null){
    var val1=document.getElementById('p_ajax_p_category').value;
  }
  $.ajax({
 type: 'post',
 url: 'ajax/fetch_sub_cat.php',
 data: {
  subs_parent_id:val,
  sub_id:val1
 },
 success: function (response) {
  document.getElementById("fetched_sub").innerHTML=response; 
 }
 });
}
window.onload = fetch_sub_cat();


//generate random string
// function genrand(){
//   const xhr = new XMLHttpRequest();
//   xhr.onload = function () {
//     document.getElementById("randomcouponcode").value = xhr.responseText;
//   }
//   xhr.open("GET","ajax/generate_random_string.php");
//   xhr.send();
// }
function randomString(length){
  chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  output = "";
  for(x = 0; x < length; x++) {
    i = Math.floor(Math.random() * 62);
    output += chars.charAt(i);
  }
  return output;
}

function rand(){
  var showrand = document.getElementById("showrand");
  showrand.value = randomString(8);
  return false;
}





//quill editor for short description
var CustomQuillDefault = new Quill('.custom-quill-editor-default', {
  theme: 'snow'
});
//product short description
document.querySelector(".quillAncor").addEventListener("click", function(event) {
  var pSmallDesc = CustomQuillDefault.root.innerHTML;
  document.getElementById("p_small_desc").value = pSmallDesc;
});


//quill editor for big description
// var CustomQuillFull = new Quill(".custom-quill-editor-full", {
//   modules: {
//     toolbar: [
//       [{
//         font: []
//       }, {
//         size: []
//       }],
//       ["bold", "italic", "underline", "strike"],
//       [{
//           color: []
//         },
//         {
//           background: []
//         }
//       ],
//       [{
//           script: "super"
//         },
//         {
//           script: "sub"
//         }
//       ],
//       [{
//           list: "ordered"
//         },
//         {
//           list: "bullet"
//         },
//         {
//           indent: "-1"
//         },
//         {
//           indent: "+1"
//         }
//       ],
//       ["direction", {
//         align: []
//       }],
//       ["link"],
//       ["clean"]
//     ]
//   },
//   theme: "snow"
// });

var CustomQuillFull = tinymce.init({
  selector: '.custom-quill-editor-full',
  plugins: 'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template paste textpattern',
  toolbar: 'undo redo | formatselect | fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | removeformat | code fullscreen'
});


//product big description
// document.querySelector(".quillAncor").addEventListener("click", function(event) {
//   var pBigDesc = CustomQuillFull.root.innerHTML;
//   document.getElementById("p_big_desc").value = pBigDesc;
// });

// Product big description
document.querySelector(".quillAncor").addEventListener("click", function(event) {
  var pBigDesc = tinymce.activeEditor.getContent('.custom-quill-editor-full');
  document.getElementById("p_big_desc").value = pBigDesc;
});



//ajax in show discount on list
function showList(value){
    const xhr = new XMLHttpRequest();
  xhr.onload=function(){
    document.getElementById("showDiscountOnList").innerHTML=this.responseText;
  }
  xhr.open("GET","ajax/fetchDiscountOnList.php?value="+value);
  xhr.send();
}