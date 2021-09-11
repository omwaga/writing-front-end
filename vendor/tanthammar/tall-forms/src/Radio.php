<?php


namespace Tanthammar\TallForms;


use Tanthammar\TallForms\Traits\HasOptions;

class Radio extends BaseField
{
    use HasOptions;

    protected function overrides(): self
    {
        $this->type = 'radio';
        return $this;
    }

    public function inputAttr(array $attributes): self
    {
        $this->attributes['input'] = $attributes;
        return $this;
    }

}
