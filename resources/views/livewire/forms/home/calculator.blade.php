<div class="calculator">
    <form id="calc_form" class="calc_mini">
        <h4 class="text-4xl font-bold">Calculate Your
            Price</h4>
        <span class="text-danger"></span>
        <p><label for="topic" class="text-gray-600">Type of paper:</label>
            <select name="service_type" id="topic" wire:model="type"
                    class="border bg-white w-full border rounded p-2">
                <?php
                use Illuminate\Support\Facades\DB;$types = DB::table('settings_languages')
                    ->orderBy('language')
                    ->get();
                ?>
                @foreach($types as $type)
                    <option value="{{ $type->language }}"> {{ $type->language }}</option>
                @endforeach
            </select>
        </p>
        <p class="ac_lvl_sel mt-3">
            <label class="mt-8 text-gray-600">Academic level:</label>
            <br>
            <select name="academic_level" wire:model="level"
                    class="bg-white w-full rounded border p-2"
                    aria-label="Academic level" id="academic_level">
                <option value="School" selected="selected">School</option>
                <option value="College">College</option>
                <option value="University">University</option>
                <option value="Doctorate">Doctorate</option>
            </select>
        </p>
        <br>
        <div class="calc-table-margin">
            <table>
                <tbody>
                <tr>
                    <td style="width: 60%">
                        <p><label class="text-gray-800">Deadline:</label>
                            <select name="deadline" wire:model="deadline" wire:click="Calculate"
                                    class="border w-full border rounded p-2 bg-white"
                                    aria-label="deadline" id="deadline">
                                <option value="">select deadline</option>
                                <option value="3h">3 hours</option>
                                <option value="12h">12 hours</option>
                                <option value="24h">24 hours</option>
                                <option value="2d">2 days</option>
                                <option value="3d">3 days</option>
                                <option value="6d">6 days</option>
                                <option value="10d">10 days</option>
                                <option value="14d">14 days</option>
                                <option value="1m">1 Month</option>
                                <option value="2m">2 Month</option>
                            </select>
                        </p>
                    </td>
                    <td style="width: 70%;">
                        <p><label id="pages_name" class="text-gray-800">Pages:</label>
                            <select id="form_pages" name="pages" wire:model="pages" wire:click="Calculate"
                                    class="border w-full border rounded p-2 bg-white"
                                    aria-label="no of pages">
                                <option selected="" value="">select pages</option>
                                @for($i = 0; $i <= 1000; $i++)
                                    <option value="{{ $i + 1 }}">{{ $i + 1 }} pages
                                    </option>
                                @endfor
                            </select>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="flex flex-row justify-between mt-4">
            <p class="price-counter mt-4"><span class="font-bold uppercase">Price: <span
                        id="calprice_div"
                        class="font-bold text-blue-700">${{ $price }}.00</span></span>
            </p>
            <a href="{{ route('order-now') }}"
               class="next-step bg-blue-400 hover:bg-blue-800 p-2 text-white rounded-lg shadow font-bold hover:shado-lg"
               type="submit">Next Step
            </a>
        </div>
    </form>
</div>
