@props(['row' => null, 'plans' => [], 'more' => ''])
<!--
    One row of the comparison table (sections/pricing-04.blade.php): the group label row when the row opens a
    new group (groupStart), then the feature row — one cell per plan, in order, reading plan1 / plan2 / plan3
    (a fourth plan shows a dash). The featured plan's cells carry the tint. Set more to mark the rows that stay
    hidden until Compare everything is pressed.
-->
@if ($row->groupStart ?? false)
<tr @if ($more)data-more @endif>
    <th scope="row" class="sticky left-0 z-10 bg-background pt-8 pb-3 pl-6 text-left font-mono text-[11px] font-medium tracking-[0.12em] text-muted-foreground/80 uppercase lg:pl-0">{{ $row->group }}</th>
    @foreach ($plans as $plan)
    <td @class(['last:pr-3 lg:last:pr-0', 'bg-muted/60' => $plan->featured == 'yes'])></td>
    @endforeach
</tr>
@endif
<tr @if ($more)data-more @endif>
    <th scope="row" class="sticky left-0 z-10 bg-background py-3.5 pr-3 pl-6 text-left text-[15px] font-normal text-foreground lg:pr-4 lg:pl-0">{{ $row->feature }}</th>
    @foreach ($plans as $plan)
    @if ($loop->iteration == 1)
    <x-compare-cell :value="$row->plan1 ?? ''" :featured="$plan->featured == 'yes'" />
    @elseif ($loop->iteration == 2)
    <x-compare-cell :value="$row->plan2 ?? ''" :featured="$plan->featured == 'yes'" />
    @elseif ($loop->iteration == 3)
    <x-compare-cell :value="$row->plan3 ?? ''" :featured="$plan->featured == 'yes'" />
    @else
    <x-compare-cell value="" :featured="$plan->featured == 'yes'" />
    @endif
    @endforeach
</tr>
