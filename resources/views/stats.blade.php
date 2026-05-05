@extends('layout')

@section('content')

<h2>Statistics</h2>

<div style="display: flex; gap:20px; margin-top:20px;">

    <div style="background:white; padding:20px; border-radius:12px;">
        <h4>Tasks Per Category</h4>
        <canvas id="chart1"></canvas>
    </div>

    <div style="background:white; padding:20px; border-radius:12px;">
        <h4>Today's Tasks</h4>
        <canvas id="chart2"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = @json($categories->keys());
const data = @json($categories->values());

new Chart(document.getElementById('chart1'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data
        }]
    }
});

// Today's Tasks chart
const todayLabels = @json($todayTasks->keys());
const todayData = @json($todayTasks->values());

new Chart(document.getElementById('chart2'), {
    type: 'pie',
    data: {
        labels: todayLabels,
        datasets: [{
            data: todayData
        }]
    }
});
</script>

@endsection