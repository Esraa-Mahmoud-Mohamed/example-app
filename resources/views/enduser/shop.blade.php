<x-enduser-layout>
    <x-slot name="content">
        <x-end-user.hero-section pageName="Shop" description="Browse our collection of high-quality interior design products and find the perfect pieces for your home." :haveButtons="false" />

        <div class="untree_co-section product-section before-footer-section">
            <div class="container">
                <div class="row">
                    <x-end-user.product-component layout="grid" />

                </div>
            </div>
        </div>
    </x-slot>
</x-enduser-layout>