checkbox input tclick

1. 
var selected = [];
$('#checkboxes input:checked').each(function() {
    selected.push($(this).attr('name'));
});

2.
var aArray = [];
window.$( "#myDiv" ).find( "input[type=checkbox][checked]" ).each( function()
{
  aArray.push( this.name );

});
