    // Current Orders Dialog

    var CurrentOrdersDialog = document.getElementById('CurrentOrders');
    function OpenCurrentOrder () {
        CurrentOrdersDialog.show()
    }

    function CloseCurrentOrder () {
        CurrentOrdersDialog.close()
    }

    // Edit dialog

    var EditDialog = document.getElementById('Edit');

    function OpenEdit () {
        EditDialog.show()
    }

    function CloseEdit () {
        EditDialog.close()
    }    

    // Time scrpit 
    
    var today = new Date();
    var date = `Date: ${today.getFullYear()}-${(today.getMonth()+1)}-${today.getDate()}`;
    var time = `Time: ${today.getHours()}:${today.getMinutes()}`;
    var dateTime = `${date} ${time}`;
    
    document.getElementById('CurrentDay').innerText = date;
    document.getElementById('CurrentTime').innerText = time;

    // End of Time script

