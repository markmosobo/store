<template>
    <TheMaster>
        <AddUserForm />
    </TheMaster>
</template>

<script>
import TheMaster from "@/components/TheMaster.vue";
import AddUserForm from "@/components/forms/users/AddUserForm.vue";

export default {
   components : {
       TheMaster,
       AddUserForm
   }
}
</script>