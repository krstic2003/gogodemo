import z from "zod";

export const MediaImageSchema = z.object({
    id: z.number(),
    name: z.string(),
    file_name: z.string(),
    mime_type: z.string(),
    size: z.number(),
    custom_properties: z.object({
        width: z.number(),
        height: z.number(),
    }),
    uuid: z.string(),
    original_url: z.string(),
    updated_at: z.string(),
    created_at: z.string(),
});

type MediaImage = z.infer<typeof MediaImageSchema>;

export default MediaImage;
