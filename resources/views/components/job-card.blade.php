@props(['job'])

<div class="bg-white shadow-md  rounded-lg p-4 ">
    <div class="text-center mb-3">
        <img class="w-20 mx-auto mb-2" src="/images/logo.png" alt="">
        <h1 class="text-xl tex-center font-semibold">{{$job['title']}}</h1>
        <p class="text-gray-500 tex-sm">{{$job['job_type']}}</p>
    </div>
    <p class="mb-3 tex-grey-700">
        {{Str::limit($job['description'],30)}}
    </p>
    <ul class="bg-gray-100 rounded p-2 mb-3">
        <li class="mb-2"><strong>Salary: </strong>{{$job['salary']}}$</li>
        <li class="mb-2"><strong>Location: </strong>{{$job['location']}}
            <span @class(
            ['bg-red-500' => !$job['remote'],
                'bg-green-500' => $job['remote'],
                "ml-2  font-bold text-white px-2 py-1.5 text-xs rounded-full"
                ])>
            {{$job['remote'] ? 'Remote' : 'On-site'}}
        </span></li>
        <li><strong>Requirements: </strong>{{$job['requirements']}}</li>
    </ul>
    <a href="{{route('jobs.show',['id' => $job['id']])}}" class="text-indigo-700
    text-base shadow-sm
     rounded w-full px-5 py-2.5 font-semibold bg-indigo-100 block text-center
     hover:bg-indigo-200">
        Details
    </a>
</div>