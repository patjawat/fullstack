<?php

use app\models\Room;
use yii\web\JsExpression;
use yii\helpers\Url;
$this->title = 'Event Rooms';
?>

<div class="row">
    <div class="col-md-3">
        <div class="sticky-top mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ห้องประชุม</h4>
                </div>
                <div class="card-body">
                    <!-- the events -->
                    <div id="external-events">
                        <?php foreach (Room::find()->all() as $room): ?>
                        <div class="external-event bg-success">
                            <?=$room->name;?>
                        </div>
                        <?php endforeach;?>
                        <div class="checkbox">
                            <label for="drop-remove">
                                <input type="checkbox" id="drop-remove">
                                remove after drop
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                        <ul class="fc-color-picker" id="color-chooser">
                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                            <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                        </ul>
                    </div>
                    <!-- /btn-group -->
                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                        <div class="input-group-append">
                            <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                        </div>
                        <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-body p-3">
                <!-- THE CALENDAR -->
                <?=edofre\fullcalendar\Fullcalendar::widget([
    'options' => [
        'id' => 'calendar',
        'language' => 'th',
    ],
    'clientOptions' => [
        'weekNumbers' => true,
        'selectable' => true,
        'selectable' => true,
        'selectHelper' => true,
        'editable' => true,
        'defaultView' => 'month',
        'eventResize' => new JsExpression("
                function(event, delta, revertFunc, jsEvent, ui, view) {
                    console.log('eventResize'+event);
                }
            "),
        'select' => new JSExpression("function(start, end, allDay,view,date,calEvent) {
            if (view.name == 'day') return;
                view.calendar.gotoDate(date);
                view.calendar.changeView('agendaDay');
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                console.log(start+' === '+end);
                console.log(view.name)
                if(view.name =='agendaDay'){
                    modalShow(start,end)
                }
        }"),
        'eventClick' => new JsExpression("
                function(event, delta, revertFunc, jsEvent, ui, view) {
                    console.log('eventClick'+event);
                }
            "),
        //     'dayClick' => new JsExpression("
        //     function (date, allDay, jsEvent, view) {
        //         alert(date);
        //     }
        // "),
        'eventDragStop' => new JsExpression("
            function(start,end,event, delta, revertFunc, jsEvent, ui, view,calEvent) {
                // console.log('eventDragStop'+event);
                // var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                // var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                console.log(start)
            }
        "),
        'eventReceive' => new JsExpression("
            function(event, delta, revertFunc, jsEvent, ui, view) {
                console.log('eventReceive'+event);
            }
        "),
        //     'eventMouseover' => new JsExpression("
        //         function(event, delta, revertFunc, jsEvent, ui, view) {
        //             console.log(event.id);
        //             console.log(delta);
        //         }
        //     "),
        //     'eventMouseout' => new JsExpression("
        //     function(event, delta, revertFunc, jsEvent, ui, view) {
        //         console.log(event.id);
        //         console.log(delta);
        //     }
        // "),
    ],
    // 'events' => $events,
    'events' => Url::to(['/event-room/jsoncalendar'])
]);
?>
            </div>
        </div>

    </div>
</div>
<?php
$js = <<< JS
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'));


    function modalShow(start,end){
      $.ajax({
        type: "get",
        url: "index.php?r=event-room/create",
        data: {start:start,end:end},
        dataType: "json",
        success: function (response) {
          $('#main-modal').modal('show');
            $(".modal-dialog").removeClass('modal-lg modal-md modal-sm');
            $('.modal-content').addClass('card-outline card-primary');
            $(".modal-dialog").addClass('modal-md');
            $('#main-modal-label').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);
        }
      });

    }

JS;
$this->registerJS($js)
?>