{{ csrf_field() }}
<div class="form-group">
    <label for="name"
           class="col-sm-4 control-label">@lang('title.item-name', ['item' => lang('title.event')])</label>
    <div class="col-sm-6">
        <input required type="text" class="form-control" id="name" name="name"
               placeholder="@lang('title.item-name', ['item' => lang('title.event')])"
               value="{{ old('name', $event->name) }}">
    </div>
</div>
<div class="form-group">
    <label for="organiser"
           class="col-sm-4 control-label">@lang('title.organiser')</label>
    <div class="col-sm-6">
        <select required class="form-control" name="organiser_id">
            @foreach($organisers as $organiser)
                <option value="{{$organiser->id}}">{{$organiser->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="venue"
           class="col-sm-4 control-label">@lang('title.venue')</label>
    <div class="col-sm-6">
        <select required class="form-control" name="venue_id">
            @foreach($venues as $venue)
                <option value="{{$venue->id}}">{{$venue->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="capacity"
           class="col-sm-4 control-label">@lang('title.capacity')</label>
    <div class="col-sm-6">
        <input required type="number" class="form-control" id="capacity" name="capacity"
               placeholder="@lang('title.capacity')"
               value="{{ old('capacity', $event->capacity) }}">
    </div>
</div>
<div class="form-group">
    <label for="start"
           class="col-sm-4 control-label">@lang('title.start')
    </label>
    <div class="col-sm-6">
        <div class="input-group date" id="start">
            <input required type="datetime" class="form-control" id="start" name="start"
                   placeholder="@lang('title.start')"
                   value="{{ old('start', $event->start) }}">
            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#start').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                stepping: 15
            });
        });
    </script>
</div>

<div class="form-group">
    <label for="start"
           class="col-sm-4 control-label">@lang('title.end')
    </label>
    <div class="col-sm-6">
        <div class="input-group date" id="end">
            <input required type="datetime" class="form-control" id="end" name="end"
                   placeholder="@lang('title.end')"
                   value="{{ old('end', $event->end) }}">
            <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#end').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                stepping: 15
            });
        });
    </script>
</div>

<script type="text/javascript">
    $("#start").on("dp.change", function (e) {
        $('#end').data("DateTimePicker").minDate(e.date);
    });
    //                            $("#end").on("dp.change", function (e) {
    //                                $('#start').data("DateTimePicker").maxDate(e.date);
    //                            });
</script>

<div class="form-group">
    <label for="terms-and-conditions"
           class="col-sm-4 control-label">@lang('title.terms-and-conditions')</label>
    <div class="col-sm-6">
                                <textarea class="form-control" rows="3" id="terms-and-conditions" name="terms-and-conditions"
                                          placeholder="@lang('title.terms-and-conditions')">{{ old('terms-and-conditions', $event->terms_and_conditions) }}</textarea>
    </div>
</div>
