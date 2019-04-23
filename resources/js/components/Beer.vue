<template>
    <div class="beer row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ name }}</div>
                <div class="card-body">
                    {{ type }} by {{ brewery }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'name', 'brewery', 'type']
    }
</script>
