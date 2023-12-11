var toolbarOptions = [[{ 'font': [] }],
['bold', 'italic', 'underline', 'strike', { 'script': 'super' }, { 'script': 'sub' }, 'clean'],
[{ 'align': [] }],
[{ 'color': [] }, { 'background': [] }],
[{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '+1' }, { 'indent': '-1' }],
['link', 'image', 'video', 'code', { 'direction': 'rtl' }]];

var toolbarLideOptions = [[{'font': []}],
['bold', 'italic', 'underline', 'strike']];

var optionsLide = {
  modules: {
    toolbar: toolbarLideOptions
  },
  theme: 'snow',
  placeholder: 'Digite o conteúdo do lide aqui'
}

var options = {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: 'Digite o conteúdo aqui'
}

var quillLide = new Quill('#editorLide', optionsLide);
var quill = new Quill('#editor', options);

quill.on('text-change', function() {
  updateHiddenInput('description', quill);
});

quillLide.on('text-change', function() {
  updateHiddenInput('lide', quillLide);
});

function updateHiddenInput(inputName, quillInstance) {
  var hiddenInput = document.querySelector('input[name=' + inputName + ']');
  hiddenInput.value = quillInstance.root.innerHTML.trim();
  console.log('VALOR ' + inputName + ': ' + hiddenInput.value);
}