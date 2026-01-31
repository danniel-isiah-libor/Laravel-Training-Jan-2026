<div @class([
    "text-green-600" => $grade === 'Excellent',
    "text-blue-600" => $grade === 'Good',
    "text-orange-600" => $grade === 'Passed',
    "text-red-600" => $grade === 'Failed',
])">
    {{ $grade }}
</div>
