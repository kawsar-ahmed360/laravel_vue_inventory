class Notification{

     success(){
        new Noty({
           type:'success',
           layout:'topRight',
            text: 'successfully Done',
            timeout:1000

        }).show();
     }

     alert(){
        new Noty({
           type:'alert',
           layout:'topRight',
            text: 'are you sure',
            timeout:1000

        }).show();
     }

     error(){
        new Noty({
           type:'error',
           layout:'topRight',
            text: 'something wrong!!',
            timeout:1000

        }).show();
     }

     warning(){
        new Noty({
           type:'warning',
           layout:'topRight',
            text: 'something danger!!',
            timeout:1000

        }).show();
     }

     ImageValidation(){
        new Noty({
           type:'error',
           layout:'topRight',
            text: 'Image Upload Leass then 1 megabite!!',
            timeout:1000

        }).show();
     }


     SuccessDelete(){
        new Noty({
           type:'success',
           layout:'topRight',
            text: 'Successfully Deleted!!',
            timeout:1000

        }).show();
     }

}

export default Notification = new Notification;
