<template>
    <div>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <span style="color:red;" v-if="typeof errors !== 'undefined' && typeof errors.registration !== 'undefined'">{{ errors.registration }}</span>
                    <div v-for="(choice, index) in registration">
                        Choice {{ index }}:<input type="text" name="choices[]" v-model="registration[index]">
                    </div>
                </div>
            </div>
            <button @click.prevent="submitRegistrationForm">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: {},
                registration: {
                    A: '',
                    B: '',
                    C: ''
                }
            }
        },
        methods: {
            resetForm() {
                this.errors = {};
                this.registration = {
                    A: '',
                    B: '',
                    C: ''
                }
            },
            submitRegistrationForm() {
                this.errors = {};

                this.$http.post('/registration', {
                    'registration': this.registration
                })
                .then(response => {
                    console.log('response: ' + response.data);

                    this.resetForm();
                    alert('success');
                })
                .catch(error => {
                    console.log('error: ' + error);

                    // Validation
                    this.errors = error.response.data.errors;
                });
            }
        }
    }
</script>
