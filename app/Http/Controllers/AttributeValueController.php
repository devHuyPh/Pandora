<?php

namespace App\Http\Controllers;

use App\Models\Attibute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    public function index(Attibute $attribute)
    {
        return view('admin.attribute_values.index', compact('attribute'));
    }

    public function create(Attibute $attribute)
    {
        return view('admin.attribute_values.create', compact('attribute'));
    }

    public function store(Request $request, Attibute $attribute)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:255',
        ]);

        $attribute->values()->create($validated);

        return redirect()->route('attributes.index', $attribute->id)->with('success', 'Attribute value created successfully!');
    }

    public function edit(Attibute $attribute, AttributeValue $value)
    {
        return view('admin.attribute_values.edit', compact('attribute', 'value'));
    }

    public function update(Request $request, Attibute $attribute, AttributeValue $value)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:255',
        ]);

        $value->update($validated);

        return redirect()->route('attributes.values.index', $attribute->id)->with('success', 'Attribute value updated successfully!');
    }

    public function destroy(Attibute $attribute, AttributeValue $value)
    {
        $value->delete();
        return redirect()->route('attributes.values.index', $attribute->id)->with('success', 'Attribute value deleted successfully!');
    }
}

