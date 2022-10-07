var valuelist = document.getElementById('valuelist');
var text = '<span> you have selected: </span>';
var listArray=[]

var checkboxes = document.querySelectorAll('.checkbox');

for(var checkboxe of checkboxes)
{
    checkboxe.addEventListener('click',function()
    {
        if(this.checked == true)
        {
            listArray.push(this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        } 
        else
        {
            listArray = listArray.filter(e => e !== this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        }
    })
}