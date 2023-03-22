<x-app-layout >
   <div class="container">
       <a href="{{route('company.create')}}">
           <button class="btn btn-success">
               Create
           </button>
       </a>
       @if(!$companies-> isEmpty())
           <table class="table">
               <thead>
               <tr>
                   <th scope="col">STT</th>
                   <th scope="col">Name Company</th>

                   <th scope="col">Handle</th>
               </tr>
               </thead>
               <tbody>
               @foreach($companies as $company)
                   <tr>
                       <th scope="row">1</th>
                       <td>{{$company->name}}</td>
                       <td>
{{--                           <a href="{{route('company.edit',$company->id)}}">--}}
{{--                               <button class="btn btn-warning">--}}
{{--                                   Edit--}}
{{--                               </button>--}}
{{--                           </a>--}}

{{--                           <a href="{{route('company.destroy',$company->id)}}">--}}
{{--                               <button class="btn btn-danger">--}}
{{--                                   Delete--}}
{{--                               </button>--}}
{{--                           </a>--}}
                           <a href="#">
                               <button class="btn btn-success">Plan 6 Months (<span class="text-danger">trial 30 days</span>) </button>
                           </a>
                           <a href="#">
                               <button class="btn btn-warning">Plan 12 Months (<span class="text-danger">trial 30 days</span>) </button>
                           </a>
                       </td>

                   </tr>
               @endforeach


               </tbody>
           </table>
       @endif
   </div>

</x-app-layout>
