<template>
    <b-card
        style="max-width: auto; font-weight:bold; font-size: 18px;"
        header-bg-variant="dark"
        header-tag="header"
        align="center"
        no-body
        >
        <template slot="header">
            Obras
        </template>
        <b-card-body align="left">
            <table class="table striped">
                <thead>
                    <tr>
                        <th>Número de obra</th>
                        <th>Descripción</th>
                        <th>Localidad</th>
                        <th>Fondo</th>
                        <th>Monto total</th>
                        <th>Situación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2019300010001</td>
                        <td>Pavimentación de la calle 5 de Mayo</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 5 000 000</td>
                        <td class="text-center"><b-badge variant="secondary">Sin iniciar</b-badge></td>
                        <td><a href="detalle-obra" class="btn btn-secondary">Detalle</a></td>
                    </tr>
                    <tr>
                        <td>2019300010002</td>
                        <td>Pavimentación de la calle Hidalgo</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 450 000</td>
                        <td class="text-center"><b-badge variant="success">Bien</b-badge></td>
                        <td><a href="detalle-obra" class="btn btn-secondary">Detalle</a></td>
                    </tr>
                    <tr>
                        <td>2019300010003</td>
                        <td>Pavimentación de la calle Morelos</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 2 000 000</td>
                        <td class="text-center"><b-badge variant="warning">Preventivo</b-badge></td>
                        <td><a href="detalle-obra" class="btn btn-secondary">Detalle</a></td>
                    </tr>
                    <tr>
                        <td>2019300010004</td>
                        <td>Pavimentación de la calle Allende</td>
                        <td>Acajete</td>
                        <td>FISMDF</td>
                        <td>$ 34 000</td>
                        <td class="text-center"><b-badge variant="danger">Urgente</b-badge></td>
                        <td><a href="detalle-obra" class="btn btn-secondary">Detalle</a></td>
                    </tr>
                </tbody>
            </table>
        </b-card-body>
    </b-card>
</template>

<script>
export default {

}
</script>

<style>

</style>
