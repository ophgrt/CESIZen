
@foreach ($breathingModes as $breathingMode)
    <p>{{ $breathingMode->label}}</p>
    <p>{{ $breathingMode->inspiration_time}}</p>
    <p>{{ $breathingMode->apnea_time}}</p>
    <p>{{ $breathingMode->exhalation_time}}</p>
@endforeach
