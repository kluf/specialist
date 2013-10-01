$(document).ready(function() {
    $("#tabs").tabs();
    function myScrolling(){
        console.log("test");
        var top = $("html").scrollTop();
        if(top >= 300){
            $("body").append("<div id='my_scroll'>Scroll me</div>");
            $("#my_scroll").css({
            'height' : '20px',
            'position' : 'fixed',
            'background' : '#5BD3FF',
            'top' : '40%',
            'left' : '10px',
            'border' : '2px solid #76FFE9',
            'padding' : '3px'
            });
        }
    };
    $("window").bind('scroll',myScrolling());
    function addKonsultField(){
        if($("#ispyt:checked")){
            $("label[for='konsult'],#konsult").show();
        }else{
            $("label[for='konsult'],#konsult").hide();
        }
    }
    //$("#ispyt").bind('change',addKonsultField());
    $("label[for='konsult'],#konsult").hide();
    $("input[name='zalik']").change(function(){
        if($(this).val() === 'ispyt'){
            $("label[for='konsult'],#konsult").show('300');
            $("#konsult:checked");
        }else{
            $("label[for='konsult'],#konsult").hide('100');
        }
    });
    function addChartArea(quantity){
        $("#mainPage_slider").append('<ul class="bxslider"></ul>');
//        $("ul.bxslider").after('<div><input type="text" class="dateAdd required_my" name="begSem" value="2009-09-01" id="begSem"><input type="text" class="dateAdd required_my" name="endSem" value="2010-05-25" id="endSem"><button type="submit" class="btn" id="updateGpaphs"><i class="icon-refresh"></i>Оновити графіки</button></div>');
        for(var i=0;i<quantity;i++){
            $("ul.bxslider").append('<li class="bx-clone" style="float: left; list-style: none outside none; position: relative; width: 550px;"><span id="chart'+i+'" class="example-chart" style="height:300px;width:500px;display:block;"></span></li>');
            $("ul.bxslider").append('<li class="bx-clone" style="float: left; list-style: none outside none; position: relative; width: 550px;"><span id="pie'+i+'" class="example-chart" style="height:300px;width:500px;display:block;"></span></li>');
        }
    }
//    function addPieArea(quantity){
//        for(var i=0;i<quantity;i++){
//            $("ul.bxslider").append('<li class="bx-clone" style="float: left; list-style: none outside none; position: relative; width: 550px;"><span id="pie'+i+'" class="example-chart" style="height:300px;width:500px;display:block;"></span></li>');
//        }
//    }
    addChartArea(5);
//    addPieArea(5);
    //begin chart
    function addChart(startSemestr,finishSemestr) {
        $.ajax({
            type: 'GET',
            url: '/index.php/Loading_controller/getDataForCharts',
            dataType: 'json',
            data : {
                begSem : startSemestr,
                endSem : finishSemestr
            },
            success: function(data){
                quantity = data['0'].length;
//                addChartArea(quantity);
                for(var i=0;i<quantity;i++){
                    subQuantity = data['0'][i].length;
                    var line1 = [];
                    for(var j=0;j<subQuantity;j++){
                        line1.push([data[0][i][j]['name'], data[0][i][j]['sum_teacher_calc']/1]);
                    }
                    idForChart = '#chart'+i;    
                    $(idForChart).jqplot([line1], {
                                title: 'Навантаження по кафедрі (лінійний)',
                                seriesDefaults: {
                                    renderer: $.jqplot.BarRenderer
                                },
                                axes: {
                                    xaxis: {
                                        renderer: $.jqplot.CategoryAxisRenderer
                                    }
                                }
                            });
//                     idForChart = '#pie'+i;    
//                    $(idForChart).jqplot([line1], {
//                    title: 'Навантаження по кафедрі (тортик)',
//                    seriesDefaults: {
//                        // Make this a pie chart.
//                        renderer: $.jqplot.PieRenderer,
//                        rendererOptions: {
//                            // Put data labels on the pie slices.
//                            // By default, labels show the percentage of the slice.
//                            showDataLabels: true
//                        }
//                    },
//                    legend: {show: true, location: 'e'}
//                });
                }
            }
        });
    }
    
    function addPie(startSemestr,finishSemestr) {
        $.ajax({
            type: 'GET',
            url: '/index.php/Loading_controller/getDataForCharts',
            dataType: 'json',
            data : {
                begSem : startSemestr,
                endSem : finishSemestr
            },
            success: function(data){
                quantity = data['0'].length;
                for(var i=0;i<data[0].length;i++){
                    var dataPie = [];
                    subQuantity = data['0'][i].length;
                    for(var j=0;j<subQuantity-1;j++){
                        dataPie.push([data[0][i][j]['name'], data[0][i][j]['sum_teacher_calc']/1]);
                    }
                    idForChart = '#pie'+i;    
                    $(idForChart).jqplot([dataPie], {
                    title: 'Навантаження по кафедрі (тортик)',
                    seriesDefaults: {
                        // Make this a pie chart.
                        renderer: $.jqplot.PieRenderer,
                        rendererOptions: {
                            // Put data labels on the pie slices.
                            // By default, labels show the percentage of the slice.
                            showDataLabels: true
                        }
                    },
                    legend: {show: true, location: 'e'}
                });
                }
            }
        });
    }
    
    //adding borders to required fields and tips
    $("form").bind('submit',function(event){
    $("span[class='alert']").remove();
        $("form input.required_my").each(function(){
            if(! $(this).val()){
                var position = $(this).offset();
                var top = Math.round(position.top)+35;
                var left = Math.round(position.left)+120;
                $(this).after('<span class="alert" style="position:absolute;width:150px;top:'+top+'px;left:'+left+'px"><img src="/img/tips_corner.png" style="position:relative;top:-22px;left:20px;">Поле обов\'язкове</span>');
                event.preventDefault();
            }
        });
    });
    
   
    $("select[name='kafedra']").bind('change',function(){
        var kid = $("select[name='kafedra'] option:selected").val();
        $.ajax({
            type: 'POST',
            url: '/index.php/Main_load/getAjaxDropdowns',
            data: {'kid' : kid},
            cache: false,
            success : function(data){
                $("select[name='teacher'] option").remove();
                $("select[name='lesson'] option").remove();
                for(var i=0; i<data['lesson'].length;i++){
                    $("<option value='"+data['lesson'][i]['id']+"'>"+data['lesson'][i]['name']+"</option>").appendTo("select[name='lesson']");
                }
                for(var i=0; i<data['teacher'].length;i++){
                    $("<option value='"+data['teacher'][i]['id']+"'>"+data['teacher'][i]['surname']+" "+(data['teacher'][i]['name']).substring(0,1)+". "+(data['teacher'][i]['patronimic']).substring(0,1)+"."+"</option>").appendTo("select[name='teacher']");
                }
                console.log(data['teacher'][0]['id']);
            }
        });
        console.log(kid);
        return false;
    });
    
    
    $('#accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        pager: 'false'
    });
    
    $(".dateAdd").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            monthNames: ["Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень", "Липень",
                "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"], // Names of months for drop-down and formatting
            monthNamesShort: ["Січ", "Лют", "Бер", "Кві", "Тра", "Чер", "Лип", "Сер", "Вер", "Жов", "Лис", "Гру"], // For formatting
            dayNames: ["Неділя", "Понеділо", "Вівторок", "Середа", "Четвер", "П'ятниця", "Субота"], // For formatting
            dayNamesShort: ["Нед", "Пон", "Вів", "Сер", "Чет", "П'ят", "Суб"], // For formatting
            dayNamesMin: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
            firstDay: 1
       });

    
    $("#updateGpaphs").on('click',function(event){
        var startSemestr =  $("#begSem").val();
        var finishSemestr = $("#endSem").val(); 
            if(!startSemestr || !finishSemestr){
                alert("You must enter start and end of semestr to reload charts !");
                event.preventDefault();
            }else{
                $("#mainPage_slider div:last").remove();
                  addChartArea(5);
//                addPieArea(5);
                addChart(startSemestr,finishSemestr);
                addPie(startSemestr,finishSemestr);
                $('.bxslider').unbind('bxSlider').bxSlider({
                    auto: true
                    });                            
            }
    });
    
    
    setLogoBySeason();
    addChart();
    addPie();
    $('.bxslider').bxSlider({
                    auto: true
                });

    //slider
    
    /*$(DyplomObj.addTip());
    $(DyplomObj.formReg).bind('submit', DyplomObj.chekRegister());
    $(DyplomObj.formLog).bind('submit', DyplomObj.checkLogin());
    $(DyplomObj.emailField).bind({focus: DyplomObj.fieldFocus(DyplomObj.emailField, DyplomObj.emailTip)},
    {blur: DyplomObj.fieldBlur(DyplomObj.emailField)});
    $(DyplomObj.passField).bind({focus: DyplomObj.fieldFocus(DyplomObj.passField, DyplomObj.passTip)},
    {blur: DyplomObj.fieldBlur(DyplomObj.passField)});
    $(DyplomObj.pass2Field).bind({focus: DyplomObj.fieldFocus(DyplomObj.pass2Field, DyplomObj.pass2Tip)},
    {blur: DyplomObj.fieldBlur(DyplomObj.pass2Field)});*/
    function setLogoBySeason() {
        var myDate = new Date();
        var myMonth = myDate.getMonth();
        var myDay = myDate.getDate();
        if (myMonth === 1 || myMonth === 11 || myMonth === 0)
            $("#header img").attr("src", "/img/winther_1.png");
        else if (myMonth === 2 || myMonth === 3 || myMonth === 4) {
            $("#header img").attr("src", "/img/spring_1.png");
        } else if (myMonth === 5 || myMonth === 6 || myMonth === 7)
            $("#header img").attr("src", "/img/summer_1.png");
        else if (myMonth === 8 || myMonth === 9 || myMonth === 10) {
            if (myMonth === 10 && myDay === 31)
                $("#header img").attr("src", "/img/hell_1.png");
            else
                $("#header img").attr("src", "/img/authumn_1.png");
        }


    }

});//end of ready function
