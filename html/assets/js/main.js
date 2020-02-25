(function($, undefined){
    $(function(){
    //скрипт

    $( "#sortable" ).sortable({
        update: function( event, ui ) { //This event is triggered when the user stopped sorting and the DOM position has changed.
            var order = $(this).sortable('serialize'); // здесь Объект
            //Serializes the sortable's item ids into a form/ajax submittable string. Calling this method produces a hash that can be appended to any url to easily submit a new item order back to the server.
            //It works by default by looking at the id of each item in the format "setname_number", and it spits out a hash like "setname[]=number&setname[]=number".
            console.log(order); // item[]=21&item[]=2&item[]=24&item[]=14&item[]=17
            $.ajax({  // функция ajax
                url: '/menu/changeOrder', // changeOrder это метод в userController.php - написать
                type: 'POST',
                data: order, // передаем на сервер Объект
                success: function(text){ // вывод при успешной передаче данных на сервер
                    console.log(text);
                }
            })
        }
      });
    
    $( "#sortable" ).disableSelection();
    
    $(".propVisible").click(function(event) {
        var id = $(this).attr('data-id');
        var visible = $(this).attr('data-visible');
        visible = visible==0? 1 : 0;
        var elem = $(this); // замыкание для success:
        $('.loader-bg').removeClass('d-none');
        $.ajax({  // функция ajax
            url: '/menu/changeVisibility', // changeVisibility это метод в userController.php - написать
            type: 'POST',
            data: {
                idMenu: id,
                visibleMenu: visible
            }, // передаем на сервер Объект
            success: function(data){ // вывод при успешной передаче данных на сервер
                //console.log(data);
                if(data!=0){
                    elem.toggleClass('text-success');
                    elem.attr('data-visible', visible);
                }
                $('.loader-bg').addClass('d-none');
            }
        })
    });
    $(".breadcrumb").children().click(function(event){
        
        var a = $(this).addClass('active').attr('class');
        console.log(this);
    });
    // ******** прокрутка к якорю ***********
    $("a.scrollto").click(function() {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({
          scrollTop: destination
        }, 800);
        return false;
      });

      //***************Установить аттрибут tbody id="sortable" */
      $("#menuTable>tbody").attr('id','sortable');
        //*********Прокрутка по мере чтения******** */
        $('body').scrollgress({color: '#E74C3C'});
    
    //*************** Прокрутка до конца документа и подгрузка далее */
    var page = 0;
        $(window).scroll(function(event){
            var isBottom = $(window).scrollTop()+$(window).height()+200>=$(document).height();
            if( isBottom && !$('body').hasClass('loading')){
                //console.log(123);
                $('body').addClass('loading'); // добавить класс чтобы словить только один раз границу
                page++;

                $.ajax({
                    type: 'POST',
                    url: '/books/getNextBooks',
                    dataType: "json", // для получения массива Объектов - в booksController : в методе ..getNextBooks.-  echo json_encode($booksList);
                    data:{
                        p:page
                    },
                    success:function(data){
                        console.log(data);//смотрим что получили Array из Object{id:**,name:***,}
                        for(var i=0; i<data.length; i++){
                            addBook(data[i]);
                        }

                       $('body').removeClass('loading');
                    }
                })
            }
        })
    function addBook(book){
        
      //  var html = '<tr><td>'+book.id+'</td><td>'+book.name+'</td><td>'+book.price+'</td><td>'+book.category+'</td></tr>';
        
        var html = '<tr class="rowInp">';
        html += '<td><input class="quickChange form-control" type="text" data-input-id="'+book.id+'" data-input-col="'+book.name+'" value="'+book.category+'" readonly="readonly"></td></tr>';        
        $('#books50 tbody').append(html);

    }
    //***********************Редактирование в вспл окне ******* */
    $('.quickChange').bind('dblclick', copies);

    function copies(){
        $('.quickChange').unbind('dblclick', copies);
            var elem = $(this); // замыкание
            var popup = $('.test')
           
            elem.clone( true ).addClass('copy').prependTo(popup);//клонирование input со всеми атриб
         
            $('.popup').fadeIn(500);//вывод окошка
            
            $('.copy').click(function(event){
                var elemCopy = $(this);
                elemCopy.prop("readonly",false).blur(function(event) {
                    
                    var val = elemCopy.val();
                    var column = elemCopy.attr('data-input-col');
                    var id = elemCopy.attr('data-input-id');
                   
                    $.ajax({
                        type: 'POST',
                        url: '/books/updateBooks',
                        data: 
                        {
                            val: val,
                            col: column,
                            id: id
                        },
                        success:function(data){
                            console.log(data);
                            if(data) {
                                elem.val(val);
                                elemCopy.prop("readonly",true);
                            }
                        }
                    })
                    $('.popup').fadeOut(100);
                    elemCopy.remove();
                    $('.quickChange').bind('dblclick', copies);
                })
                
            });
            
        
    }
        
   //****************Редактирование прямо в строке */
//    $('.quickChange').dblclick(function(event) {
//         var elem = $(this); // замыкание
//         elem.prop("readonly",false).blur(function(event) {
                
//             var val = elem.val();
//             var column = elem.attr('data-input-col');
//             var id = elem.attr('data-input-id');
                       
//             $.ajax({
//                 type: 'POST',
//                 url: '/books/updateBooks',
//                 data: 
//                 {
//                     val: val,
//                     col: column,
//                     id: id
//                 },
//                 success:function(data){
//                     console.log(data);
//                     if(data) {
//                         elem.val(val);
//                         elem.prop("readonly",true);
//                         }
//                 }
//             })
                          
//         })
//    })
    
    
    
        //end of script
});
})(jQuery); 


// ++++++++++++++++ чистый JS ++++++

var userEmail = document.getElementById("userEmail"); // элемент находится в форме signup
var req = null; // глобальная переменная для отправки данных
if(userEmail){ // проверка для других страниц чтобы не было ошибки
    userEmail.addEventListener('blur',function(event){ // следим за событием blur когда происходит деактивация элемента
    //console.log(123);
    //var email = userEmail.value;

        req = new XMLHttpRequest(); // Объект XMLHttpRequest (или, как его кратко называют, «XHR») дает возможность из JavaScript делать HTTP-запросы к серверу без перезагрузки страницы. свежий релиз - https://xhr.spec.whatwg.org/
        req.addEventListener('readystatechange', processChange);//Событие readystatechange происходит несколько раз в процессе отсылки и получения ответа. При этом можно посмотреть «текущее состояние запроса» в свойстве req.readyState
        req.open("POST", "/user/check", true);// Этот метод – как правило, вызывается первым после создания объекта XMLHttpRequest.   Задаёт основные параметры запроса: method – HTTP-метод; URL – адрес запроса; тип запроса  если true – асинхронно, false синхронно - т.е. другие действия со страницей заблокированы (стр-ца как бы подвисает)

    //req.send("email="+email); // 2 --- 3 ---- 4 операция звершена /// ОТКЛЮЧИЛИ!!
        var data = new FormData(document.forms.registration); // Конструктор FormData() создает новые объект FormData, если проще - HTML-форму.Здесь принимает отбращение к форме с name="registration" => собирает все данные этой  формы и далее ...через метод send() отправлет на сервер. На сервере обратиться к данным формы можно как обычно, через input name -> $_POST['name']
		console.log(data);
        req.send(data); // метод send - открывает соединение и отправляет запрос на сервер
});
}


function processChange(){
    //console.log(req.readyState); // если равен 4 проц завершен то дальше работаем 
    if(req.readyState==4){ // «текущее состояние запроса» в свойстве req.readyState если ... 200 то все ок
        if(req.status == 200){
            if(req.responseText){ // сюда попадает то что приходит из сервера в виде строки
                console.log(2);
                //alert('Err!');
                if(!document.querySelector('.errorEmail')){ // этот if нужен для избежания повторного - бесконечного добавления span
                    userEmail.insertAdjacentHTML("afterend","<span class='text-danger errorEmail'>Пользователь с таким Email существует!</span><br>");
					//Метод insertAdjacentHTML позволяет вставлять произвольный HTML в любое место документа, в том числе и между узлами! https://learn.javascript.ru/multi-insert
					
/*
					Куда(1-й параметр) по отношению к elem вставлять строку. Всего четыре варианта:

						beforeBegin – перед elem.
						afterBegin – внутрь elem, в самое начало.
						beforeEnd – внутрь elem, в конец.
						afterEnd – после elem.
*/

                }
                
            } // попадает то что возвращ метод check() - строка то что приходит от сервера
        }
    }
}


