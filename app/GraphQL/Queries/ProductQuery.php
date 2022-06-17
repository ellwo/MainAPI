<?php

namespace App\GraphQL\Queries;

use App\Models\Bussinse;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
//        $id=$args['id'];

     $guard = \Auth::guard(config('sanctum.guard', 'web'));

/** @var \App\Models\User|null $user */
   $user = $guard->user();


   if($user!=null){





   }


        $city=$args["city"];
        $typeG=$args["typeG"];

        $types=[$typeG,3];

        $parts=$args["parts"];

        $page=isset($args["page"])?$args['page']:'1';
        $perPage=isset($args["perPage"])?$args["perPage"]:"5";
        \request()->request->set("page",$page);


        $products_byrating=Product::whereHas('cities',function (Builder $query)use($city){
            $query->where('id','=',$city);
        })->whereHas(
            'parts',function (Builder $query)use ($parts){
                $query->whereIn('id',$parts);
        }
        )->whereHas(
            'department',function (Builder $query)use($types){
                $query->whereIn('typegender',$types);
        }
        )->orderByRelation('ratings:value', 'desc', 'avg')
            ->with('cities')->withSum('ratings:value')->paginate($perPage);



            $pro_city=[
            'products'=>$products_byrating,
            'paginatorInfo'=>[
                'count'=>$products_byrating->perPage(),
                'total'=>$products_byrating->total(),
                "perPage"=>$products_byrating->perPage(),
                "currentPage"=>$products_byrating->currentPage(),
                "lastPage"=>$products_byrating->lastPage(),
                "hasMorePages"=>$products_byrating->perPage()<=$products_byrating->total()?true:false
            ]
        ];




        $products_byparts=Product::whereHas(
            'parts',function (Builder $query)use ($parts){
            $query->whereIn('id',$parts);
        }
        )->whereHas(
            'department',function (Builder $query)use($types){
            $query->whereIn('typegender',$types);
        }
        )->orderByRelation('ratings:value', 'desc', 'avg')
            ->with('cities')->withSum('ratings:value')->paginate($perPage);

        $pro_parts=[
            'products'=>$products_byparts,
            'paginatorInfo'=>[
                'count'=>$products_byparts->perPage(),
                'total'=>$products_byparts->total(),
                "perPage"=>$products_byparts->perPage(),
                "currentPage"=>$products_byparts->currentPage(),
                "lastPage"=>$products_byparts->lastPage(),
                "hasMorePages"=>$products_byparts->perPage()<=$products_byparts->total()?true:false
            ]
        ];

        //$pagintor=$products_byrating->links()->getData()["paginator"];


/*        $products=
            Product::whereRelation(
             'cities','id','=',$city
            )
                ->whereHas(
               'department',function (Builder  $query)use($types){
                   $query->whereIn('typegender',$types);
                }
            )->OrwhereHas('parts', function (Builder $query)use($parts) {
                $query->whereIn('id',$parts);
            })
                ->with('cities','parts','department')->get();
*/

        //   return Bussinse::select('name','id')->whereRelation(
            //     'cities','name','LIKE','%o%')->with('products:name,price,bussinse_id','cities:name')->get();


        $data=[
            'productspagenate'=>null,
            'bussinses'=>null,
            'services'=>null,
            'products_bycity'=>$products_byrating,
            'products_byparts'=>$pro_parts
        ];


        return $data;

  //      return Product::where("id","=",$id)->get();




    }
}
