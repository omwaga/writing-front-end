<?php


namespace Tanthammar\TallForms;


class Textarea extends BaseField
{
    public $textarea_rows = 5;
    public $placeholder;
    public $required = false;

    protected function overrides(): self
    {
        $this->type = 'textarea';
        $this->align_label_top = true;
        return $this;
    }

    public function rows(int $rows = 5): Textarea
    {
        $this->textarea_rows = $rows;
        return $this;
    }

    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function required(): self
    {
        $this->required = true;
        return $this;
    }

    public function inputAttr(array $attributes): self
    {
        $this->attributes['input'] = $attributes;
        return $this;
    }

}
