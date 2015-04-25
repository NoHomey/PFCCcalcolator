<form onkeypress="return InstanceOfAdderReferencer.ReferenceToAdder(event)">
    <select required class="Select" id="Select5" onchange="InstanceOfResultUpdater.UpdateResult();">
        <option disabled selected>
            Choose Metric
        </option>
        <option>
            Gram(g)
        </option>
        <option>
            Kilogram(kg)
        </option>
        <option>
            Pound(lb)
        </option>
        <option>
            Ounce(oz)
        </option>
    </select> <select class="Select" id="Select1" onchange="InstanceOfSelectOptions.DisplayAllSelectOptions('Select2')">
        <script>
    InstanceOfSelectOptions.DisplayAllSelectOptions('Select1');
        </script>
    </select> <select class="Select" id="Select2" onchange="InstanceOfSelectOptions.DisplayAllSelectOptions('Select3')">
        <option disabled selected>
            Choose SubType
        </option>
    </select> <select class="Select" id="Select3">
        <option disabled selected>
            Is it Cooked?
        </option>
    </select> <input class="Select" id="Select4" min="1" type="number" value="0"> <input class="Plus" id="Operator" onclick="return InstanceOfAdderReferencer.ReferenceToAdder(event)" type="button" value="+"><br>
    <br>
    <input class="Select" id="InterfaceExpander" onclick="InstanceOfExpander.Expand()" type="button" value="List Options">
</form>
