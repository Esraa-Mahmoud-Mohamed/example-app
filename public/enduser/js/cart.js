window.cartPage = function (initial) {

    return {

        subtotal: initial.subtotal,
        discount: initial.discount,
        total: initial.total,
        coupon: initial.coupon ?? '',

        // couponMessage: '',
        // couponSuccess: false,


        async applyCoupon() {
            var notyf = new Notyf();
            const response = await fetch('/cart/coupon', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: new URLSearchParams({
                    code: this.coupon,
                }),
            });

            const data = await response.json();

            // this.couponSuccess = data.success;
            // this.couponMessage = data.message;
            console.log(data.success);
            if (data.success) {
                // alert(data.message || 'An error occurred while applying the coupon.');
                notyf.success(data.message || 'Coupon applied successfully.');

                return;
            }

            if (data.success) {
                this.subtotal = Number(data.subtotal);
                this.discount = Number(data.discount);
                this.total = Number(data.total);
            }
        },


        async increase(id, stock) {
            var notyf = new Notyf();

            const qtyInput = document.getElementById(`qty-${id}`);


            let quantity = Number(qtyInput.value) + 1;
            
            // Ensure the quantity does not exceed the available stock
            if (quantity > stock) {
                quantity = stock;
                // alert(`Cannot add more than ${stock} items to the cart.`);
                notyf.error(`Cannot add more than ${stock} items from this product to the cart.`);
            }

            await this.sync(id, quantity);

        },

        async decrease(id) {

            const qtyInput = document.getElementById(`qty-${id}`);

            let quantity = Number(qtyInput.value);

            if (quantity == 1) return;

            quantity--;

            await this.sync(id, quantity);

        },

        async sync(id, quantity) {

            const input = document.getElementById(`qty-${id}`);

            input.value = quantity;

            const row = input.closest("tr");

            const price = Number(
                row.querySelector(".unit-price").dataset.price
            );


            const url = row.dataset.updateUrl;

            const response = await fetch(
                url,
                {
                    method: "PATCH",

                    headers: {

                        "Content-Type": "application/json",

                        "X-CSRF-TOKEN":
                            document
                                .querySelector('meta[name="csrf-token"]')
                                .content,

                        "Accept": "application/json",
                    },

                    body: JSON.stringify({
                        quantity
                    })
                }
            );

            const data = await response.json();

            console.log(response.status);
            console.log(data);

            if (!response.ok) {
                alert(data.message || "An error occurred while updating the cart.");
                input.value = quantity - 1; // revert to previous quantity
                return;
            }
            row.querySelector(".row-total").innerText =
                "$" + (price * quantity).toFixed(2);

            this.subtotal = data.subtotal;
            this.discount = data.discount;
            this.total = data.total;
        }

    }

}