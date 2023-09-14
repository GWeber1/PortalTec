var toolbarOptions = [[{ 'font': [] }],
['bold', 'italic', 'underline', 'strike', { 'script': 'super' }, { 'script': 'sub' }, 'clean'],
[{ 'align': [] }],
[{ 'color': [] }, { 'background': [] }],
[{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '+1' }, { 'indent': '-1' }],
['link', 'image', 'video', 'code', { 'direction': 'rtl' }]];

var options = {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: 'Digite o conteúdo aqui'
}
var quill = new Quill('#editor', options);

var form = document.querySelector('form');
form.onsubmit = function () {
  var description = document.querySelector('input[name=description]');
  description.value = quill.root.innerHTML.trim();
}