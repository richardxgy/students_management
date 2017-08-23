$("#addclass").click(function () {

    var $classname = $('#classname').val();


    if (!$classname){
        $("#classname").next('.err').html('班级名字必填');
        return;
    };

    var $classdesc = $("#classdesc").val();

    $.ajax({
        url:'./addclasssubmit.php',
        type:'POST',
        dataType:'json',
        data:{classname:$classname,classdesc:$classdesc},

        success:function (data) {
            console.log(data)
        }

    });

});


$("#addstudent").click(function () {

    $.ajax({
        url:'./addstudentsubmit.php',
        type:'POST',
        dataType:'json',
        data:$("#addform").serialize(),
        success:function (data) {
            console.log(data)
        }
    });

});


$("#updatestudent").click(function () {
    console.log($("#updateform").serialize())
    $.ajax({
        url:'./updatestudentsubmit.php',
        type:'POST',
        dataType:'json',

        data:$("#updateform").serialize(),

        success:function (data) {
            console.log(data)
        }

    });

});



$("#updateclasss").click(function () {

    console.log($("#updateclass").serialize())
    $.ajax({
        url:'./updateclasssubmit.php',
        type:'POST',
        dataType:'json',

        data:$("#updateclass").serialize(),

        success:function (data) {
            console.log(data)
        }

    });

});