<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            'Direccion de Gestion de RR-HH',
            'Despacho Municipal',
            'Secretaria Municipal Administrativa y Financiera',
            'Secretaria Municipal de Ordenamiento Territorial',
            'Secretaria Municipal de Planificacion para el Desarrollo',
            'Secretaria Municipal de Desarrollo Economico',
            'Secretaria Municipal de Salud Educacion y Deportes',
            'Secretaria Municipal General y de Gobernabilidad',
            'Secretaria Municipal de Turismo y Cultura',
            'Secretaria Municipal de Infraestructura Publica',
            'Secretaria Municipal de Desarrollo Humano y Social',
            'Direccion de Gestion Legal',
            'Ventanilla Unica',
            'Direccion de Turismo',
            'Hospital San Pedro Claver',
            'Direccion Municipal de Salud',
            'Direccion de Gestion Social',
            'Direccion Administrativa',
            'Direccion de Finanzas',
            'Direccion de Contrataciones',
            'Direccion de Ingresos',
            'Jefatura de Tecnologias de La Información',
            'Direccion de Educacion',
            'Direccion Integral Municipal de Gestion de Riesgos',
            'Direccion de Auditoria',
            'Direccion de Transparencia',
            'Direccion de Auditoria Interna',
            'Direccion General de Gestion Legal',
            'Direccion de Regularizacion Del Derecho Propietario',
            'Direccion de Regularizacion Territorial',
            'Sub Alcaldia D-5',
            'Ordenamiento Territorial y Ambiental',
            'Plan Municipal de Ordenamiento Territorial',
            'Direccion de Patrimonio Historico',
            'Sub Alcaldia D-1',
            'Sub Alcaldia D-6',
            'Sub Alcaldia D-2',
            'Sub Alcaldia D-7',
            'Jefatura de Deportes',
            'Espectaculos Publicos',
            'Intendencia Municipal',
            'Direccion de Seguridad Ciudadana',
            'Sub Alcaldia D-4',
            'Direccion de Infraestructura',
            'Direccion de Medio Ambiente',
            'Direccion Municipal de Juventudes',
            'Direccion Municipal de Turismo',
            'Direccion Municipal de Cultura',
            'Sub Alcaldia D-8',
            'Direccion de Estudios y Proyectos',
            'Direccion de Alumbrado Publico',
            'Sub Alcaldia D-3',
            'Direccion de Comunicacion',
            'Direccion de Odeco',
            'Direccion de Relaciones Internacionales',
            'Direccion de Planificacion Estrategica',
            'Jefatura de Operaciones',
            'Defensoria de La Niñez y Adolescencia',
            'Jefatura de Activos Fijos',
            'Umadis',
            'Area de Genero',
            'Coordinacion de Mercados',
            'Fondo de Desarrollo Indigena',
            'Direccion de Promocion Mercados y Empresas',
            'Direccion  de Gestion Social',
            'Direccion Municipal de Cumunicacion',
            'Direccion Municipal de Comunicacion',
            'Planificacion Territorial',
            'Direccion Municipal de Educacion',
            'Departamento de Fiscalizacion y Supervicion de Obras',
            'Departamento de Fiscalizacion y Supervision de Obras',
            'Hogar 25 de Mayo',
            'Jefatura de Catastro',
            'Programa Delimitacion Territorial',
            'Secretaria Municipal de Turismo y Culturas',
            'Direccion de Cultura',
            'Asistencia A La Familia',
            'C.I.D.I.M. Mercado Campesino',
            'C.I.D.I.M. Mercado Central',
            'Lusavi',
            'Programa Almuerzo Educativo Saludable',
            'Servicio Legal Integral Municipal',
            'Programa Municipal Del Adulto Mayor',
            'Direccion de Planificacion Estrategica y Operativa',
            'Fortalecimiento Coordinacion y Planificacion Estrategica Municipal',
            'Jefatura de Maestranza',
            'Direccion de Desarrollo Productivo y Empresarial',
            'Direccion Financiera',
            'Planta Asfaltadora',
            'Direccion de Riesgos',
            'Distrito 2',
            'Planificacion - Delimitacion Territorial',
            'Direccion  de Regularizacion Territorial',
            'Secretaria Municipal de Salud Educacion y Deportes1987',
            'Intendencia Municipal - Direccion de Seguridad Ciudadana',
            'Asuntos Etnicos Genero y Generacional'            
        ];

        foreach ($units as $value) {
            App\Unit::create([
                'name' => $value,
                'slug' => $value
            ]);
        }
    }
}
