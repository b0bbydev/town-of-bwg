/* Name: Bobby Jonkman
 * Purpose: Project for BWG co-op interview.
 */

// Ajax function to show values in table.
    $(document).ready(function(){
        $('#editable_table').Tabledit({
            url:'includes/action.php',
            columns:{
                identifier:[0, "id"],
                editable:[[1, 'first_name'], [2, 'last_name'], [3, 'job_title']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }// end of if.
            }
        });
    });

// the following function enables the 'master' form to show/hide different forms, depending on the selected value.
function changeOptions(selectEl)
{
    let selectedValue = selectEl.options[selectEl.selectedIndex].value;
    let subForms = document.getElementsByClassName('text-center');
    for (let i = 0; i < subForms.length; i += 1)
    {
        if (selectedValue === subForms[i].name)
        {
            subForms[i].setAttribute('style', 'display:block')
        } else {
            subForms[i].setAttribute('style', 'display:none')
        }// end of if-else
    }// end of for.
}// end of function