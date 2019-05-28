<?php

use Illuminate\Database\Seeder;

class CatTecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_tecnico')->insert([
            ['nombre' =>'Factibilidad del proyecto por la Dependencia Normativa (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Validación del proyecto por la Dependencia Normativa (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Estudio socioeconómico (aplica al FAIS). ', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Manifestación del impacto ambiental (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Resolutivo en materia de impacto ambiental emitido por la Instancia competente (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Permisos, licencias y afectaciones (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Autorización del H. Congreso del Estado para realizar obras cuyo monto exceda del 20 % de la partida presupuestal respectiva (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Proyecto ejecutivo y/o planos actualizados.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Presupuesto base.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Análisis de precios unitarios del presupuesto base.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Explosión de insumos del presupuesto base.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Programa de ejecución de obra del presupuesto base.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Programa de suministro de materiales, mano de obra, maquinaria y/o equipo complementario de obra del presupuesto base.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Convocatoria pública.', 'adju_directa' => 0, 'invitacion' => 0, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Bases del concurso.', 'adju_directa' => 0, 'invitacion' => 0, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Oficios de invitación difundida por internet.', 'adju_directa' => 0, 'invitacion' => 1, 'licitacion_publica' => 0, 'archivo' => 0],
            ['nombre' =>'Bases del concurso.', 'adju_directa' => 0, 'invitacion' => 1, 'licitacion_publica' => 0, 'archivo' => 0],
            ['nombre' =>'Acta de presentación y apertura de propuestas (técnica y económica).', 'adju_directa' => 0, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Análisis de las propuestas (cuadro comparativo).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Presupuestos de las propuestas.', 'adju_directa' => 0, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Dictamen técnico de evaluación.', 'adju_directa' => 0, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Acta de adjudicación o fallo.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Registro en el padrón de contratistas de SEFIPLAN.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Registro de la obra ante el IMSS', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Contrato de obra.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 1],
            ['nombre' =>'Presupuesto contratado.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Análisis de precios unitarios del presupuesto contratado.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Análisis del factor de sobrecosto del presupuesto contratado.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Programa de ejecución de obra del presupuesto contratado.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Programa de suministro de materiales, mano de obra, maquinaria y/o equipo complementario del presupuesto contratado.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Bitácora de obra ', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1],
            ['nombre' =>'Estimaciones de obra.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Números generadores de volúmenes de obra ejecutada.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Convenios modificatorios', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Pruebas de laboratorio (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Reporte fotográfico.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1],
            ['nombre' =>'Sanción por incumplimiento al contrato y/o al programa de obra.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Fianza de anticipo (en su caso, evidencia de haberla hecho efectiva o el trámite que se esté realizando para ello)', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1],
            ['nombre' =>'Fianza de Cumplimiento (en su caso, evidencia de haberla hecho efectiva o el trámite que se esté realizando para ello)', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 1],
            ['nombre' =>'Fianza de Vicios Ocultos (en su caso, evidencia de haberla hecho efectiva o el trámite que se esté realizando para ello)', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1],
            ['nombre' =>'Acta de entrega recepción del contratista al Ayuntamiento.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1],
            ['nombre' =>'Finiquito de obra.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Aviso de terminación de los trabajos del contratista al Ayuntamiento.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Constancia de verificación de los trabajos concluidos por parte del municipio.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Acta de entrega recepción del Ayuntamiento al Comité de Contraloría Social.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Acta de entrega recepción a la Dependencia Normativa (según sea el caso).', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Copias de recibo de las aportaciones comunitarias', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1,'archivo' => 0],
            ['nombre' =>'Fotocopia de las pólizas cheque con su respectiva factura del pago de estimaciones.', 'adju_directa' => 1, 'invitacion' => 1, 'licitacion_publica' => 1, 'archivo' => 1]
        ]);
    }
}
