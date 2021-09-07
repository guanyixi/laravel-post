@props(['name', 'row'=>'3'])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea class="border border-gray-400 p-2 w-full rounded" name="{{$name}}" id="{{$name}}" rows="{{$row}}" required {{$attributes}}>{{$slot??old($name)}}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>